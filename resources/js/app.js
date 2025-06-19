import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

function clearTags() {
    const tagsSelect = document.getElementById('tags_ids');
    Array.from(tagsSelect.options).forEach(option => {
        option.selected = false;
    });
}
