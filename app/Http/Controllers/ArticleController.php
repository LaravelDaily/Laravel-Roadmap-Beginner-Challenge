<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Category;
use App\Models\Tag;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use RuntimeException;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(5);

        return view('articles.index', compact('articles'));
    }

    public function homepage()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(2);

        return view('homepage', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function store(ArticleRequest $request): RedirectResponse
    {
        // Capture os dados do formulário
        $validatedData = $request->validated();

        // Adicione o user_id ao array de dados
        $data = array_merge($validatedData, ['user_id' => auth()->id()]);

        // Adicione o category_id ao array de dados se estiver presente na solicitação
        if ($request->has('category_id')) {
            $data['category_id'] = $request->category_id;
        }

        // Verifique se o request tem uma imagem
        if ($request->hasFile('image')) {
            $imagePaths = $this->handleImageUpload($request->file('image'));
            $data['image'] = $imagePaths['original'];
            $data['resized_image'] = $imagePaths['resized'];
        }

        // Crie um novo artigo
        $article = Article::create($data);

        // Associe as tags ao artigo
        if (is_array($request->tag_id)) {
            foreach ($request->tag_id as $tag_id) {
                ArticleTag::create([
                    'article_id' => $article->id,
                    'tag_id' => $tag_id,
                ]);
            }
        } else {
            // Handle the case when tag_id is not an array or not sent in the request
            // You can log an error message or throw an exception
            Log::error('tag_id is not an array or not sent in the request');
        }

        session()->flash('createdSuccess', [
            'message' => 'Article created!',
        ]);

        // Redirecione o usuário de volta para a página de criação de artigos com uma mensagem de sucesso
        return redirect()->route('article.index')->with('success', 'Article created successfully');
    }

    /**
     * @throws Exception if $file is not an instance of UploadedFile
     */
    private function handleImageUpload(array|UploadedFile|null $file): array
    {
        if ($file instanceof UploadedFile) {
            // Gere um novo nome de arquivo baseado na hora atual e na extensão do arquivo
            $imageName = Str::random(10).'.'.$file->extension();

            // Mova o arquivo para a pasta public/images/articles-resized
            $file->move(public_path('storage/images/articles'), $imageName);

            // Caminho completo da imagem original
            $originalImagePath = 'storage/images/articles/'.$imageName;

            // Redimensiona a imagem
            $resizedImagePath = $this->resizeImage($originalImagePath);

            // Retorne o caminho do arquivo
            // Retorne os caminhos das imagens
            return [
                'original' => $originalImagePath,
                'resized' => $resizedImagePath,
            ];
        }

        // Se o arquivo não for uma instância de UploadedFile, lance uma exceção
        throw new RuntimeException('The file is not a valid instance of UploadedFile');
    }

    private function resizeImage(string $imagePath): string // Abre a imagem
    {$image = ImageManager::imagick()->read($imagePath);

        // Redimensiona a imagem
        $image->resize(984, 384);

        // Define o novo caminho da imagem com o sufixo -resized
        $resizedImagePath = str_replace('storage/images/articles', 'storage/images/articles-resized', $imagePath);
        // Define o novo caminho da imagem com o sufixo -resized e a pasta articles-resized
        $resizedImagePath = pathinfo($resizedImagePath, PATHINFO_DIRNAME).'/'.
        pathinfo($resizedImagePath, PATHINFO_FILENAME).'-resized.'.pathinfo($resizedImagePath, PATHINFO_EXTENSION);

        // Verifica se o diretório existe, se não, cria o diretório
        $resizedImageDir = pathinfo($resizedImagePath, PATHINFO_DIRNAME);
        if (! file_exists($resizedImageDir) && ! mkdir($resizedImageDir, 0777, true) && ! is_dir($resizedImageDir)) {
            throw new RuntimeException(sprintf('Directory "%s" was not created', $resizedImageDir));
        }
        // Salva a imagem redimensionada
        $image->save($resizedImagePath);

        // Retorna o caminho da imagem redimensionada
        return $resizedImagePath;
    }

    public function create()
    {
        $categories = Category::all(); //usado para popular o select Category
        $tags = Tag::all();            //usado para popular o Select Tag

        return view('articles.create', compact('categories', 'tags'));
    }

    public function destroy($id): RedirectResponse
    {
        $article = Article::find($id);

        if ($article) {
            $article->delete();

            // Armazenar dados na sessão
            session()->flash('deletedSuccess', [
                'message' => 'Article deleted!',
            ]);

            return redirect()->route('article.index');
        }

        return redirect()->route('article.index')->with('error', 'Article not found');
    }

    public function edit($id)
    {
        $article = Article::find($id);
        $categories = Category::all(); //usado para popular o select Category
        $tags = Tag::all();            //usado para popular o Select Tag

        return view('articles.edit', compact('article', 'categories', 'tags'));
    }

    public function update(ArticleRequest $request, $id): RedirectResponse
    {
        $article = Article::findOrFail($id);

        // Captura os dados do formulário
        $validatedData = $request->validated();

        // Adiciona o user_id ao array de dados
        $data = array_merge($validatedData, ['user_id' => auth()->id()]);
        
        //array para manipulação da mensagem flash
        $oldValues = [
            'title' => $article->title,
            'full_text' => $article->full_text,
            'category' => optional($article->category)->name,
            'tags' => implode(', ', $article->tags->pluck('name')->toArray()),
            'image' => basename($article->image),
        ];

        // Verifique se a imagem foi enviada e alterada
        if ($request->hasFile('image')) {
            // Manipula o upload da imagem
            $imagePaths = $this->handleImageUpload($request->file('image'));
            // Adicione os caminhos da imagem ao array de dados
            $data['image'] = $imagePaths['original'];
            $data['resized_image'] = $imagePaths['resized'];
        } else {
            // Se a imagem não foi enviada, usa a imagem atual
            $data['image'] = $article->image;
            $data['resized_image'] = $article->resized_image;
        }

        // Atualiza o artigo
        $article->update($data);

        /**
         * O método sync é usado para sincronizar as relações de muitos para muitos em um modelo do Laravel.
         * Ele aceita um array de IDs como argumento e sincroniza a tabela pivot para corresponder exatamente a esses IDs.
         * Qualquer ID que não esteja no array fornecido será removido da tabela pivot através do →detach().
         *
         * @param  array  $ids  Um array de IDs para sincronizar com a tabela pivot.
         * @return void
         */
        // Sincroniza as tags
        if (is_array($request->tag_id)) {
            $article->tags()->sync($request->tag_id);
        } else {
            $article->tags()->detach();
        }

        $newValues = [
            'title' => $request->title,
            'full_text' => $request->full_text,
            'category' => Category::find($request->category_id)->name ?? null,
            'tags' => implode(', ', Tag::whereIn('id', $request->tag_id ?? [])->pluck('name')->toArray()),
            'image' => basename($data['image'] ?? ''),
        ];

        // Inicializa um array para armazenar as alterações
        $changes = [];

        // Verifique cada campo para ver se houve alguma alteração
        foreach ($oldValues as $field => $oldValue) {
            if ($oldValue !== $newValues[$field]) {
                $changes[$field] = [
                    'old' => $oldValue,
                    'new' => $newValues[$field],
                ];
            }
        }

        // Se houve alguma alteração, armazene as alterações na sessão flash
        if (!empty($changes)) {
            session()->flash('updatedSuccess', [
                'message' => 'Article updated!',
                'changes' => $changes,
            ]);
        }

        return redirect()->route('article.index');
    }

    public function removeImage($id): RedirectResponse
    {
        $article = Article::find($id);

        if ($article && $article->image) {
            // Remova a imagem do sistema de arquivos se necessário
            // Storage::delete($article->image);

            $article->image = null;
            $article->resized_image = null;
            $article->save();

            return redirect()->route('article.edit', $article->id)->with('success', 'Image removed successfully');
        }

        return redirect()->route('article.edit', $article->id)->with('error', 'Image not found');
    }
}
