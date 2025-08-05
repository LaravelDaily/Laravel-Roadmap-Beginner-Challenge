<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Imagick\Driver;
use Intervention\Image\ImageManager;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition(): array
    {
        // Cria uma nova instância do gerenciador com o driver desejado
        $manager = new ImageManager(new Driver());

        // Cria uma nova imagem com 640x480
        $image = $manager->create(640, 480)->fill('ccc');

        // Define o nome da imagem
        $imageName = Str::random(10).'.jpg';

        // Define o diretório onde a imagem será salva
        $dir = public_path('articles');

        // Verifica se o diretório existe, se não, cria o diretório
        if (! file_exists($dir)) {
            if (! mkdir($dir, 0777, true) && ! is_dir($dir)) {
                throw new \RuntimeException(sprintf('Directory "%s" was not created', $dir));
            }
        }

        // Salva a imagem no diretório 'public/articles'
        $image->save($dir.'/'.$imageName);

        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'title' => $this->faker->word(),
            'full_text' => $this->faker->text(),
            'image' => 'articles/'.$imageName,
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
        ];
    }
}
