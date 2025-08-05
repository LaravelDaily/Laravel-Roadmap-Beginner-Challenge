document.getElementById('add-tag').addEventListener('click', function () {
    const select = document.getElementById('tags');
    const selectedOption = select.options[select.selectedIndex];
    const tagId = selectedOption.value;
    const tagName = selectedOption.text;


    // Create new badge
    const badge = document.createElement('span');
    badge.id = 'badge-dismiss-' + tagName.toLowerCase();
    badge.className = 'inline-flex items-center px-2 py-1 me-2 text-sm font-medium text-green-800 bg-green-100' +
        ' rounded dark:bg-green-900 dark:text-green-300';
    badge.innerHTML = tagName + ' <button type="button" class="inline-flex items-center p-1 ms-2 text-sm' +
        ' text-green-400 bg-transparent rounded-sm hover:bg-green-200 hover:text-green-900 dark:hover:bg-green-800' +
        ' dark:hover:text-green-300" data-dismiss-target="#badge-dismiss-' + tagName.toLowerCase() + '" aria-label="Remove">' +
        '<svg class="w-2 h-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">' +
        '<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>' +
        '</svg><span class="sr-only">Remove badge</span></button>';

    // Add new badge to tag badges
    document.getElementById('tag-badges').appendChild(badge);

    // Create hidden input for tag
    const input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'tag_id[]';
    input.value = tagId;

    // Add hidden input to form
    document.querySelector('form').appendChild(input);

    // Add event listener to remove button
    badge.querySelector('button').addEventListener('click', function () {
        // Remove badge and corresponding input
        badge.remove();
        input.remove();
    });


});