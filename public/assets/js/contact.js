

let categoryRadios = document.querySelectorAll('input[name="contact_type"]');
let languageRow = document.querySelector('.languageName');
let wordRow = document.querySelector('.wordName');
let readingRow = document.querySelector('.readingName');
let meaningRow = document.querySelector('.meaningName');
let contactItemRow = document.querySelector('.example');

console.log(categoryRadios);
console.log(languageRow);

// 選択肢が変更されたときの処理
categoryRadios.forEach(radio => {
    radio.addEventListener('change', () => {
        console.log("radio.value");
        if (radio.value == 2 || radio.value == 3) {
            languageRow.style.display = 'none';
            wordRow.style.display = 'none';
            readingRow.style.display = 'none';
            meaningRow.style.display = 'none';
            contactItemRow.style.display = 'none';
        } else {
            languageRow.style.display = 'table-row';
            wordRow.style.display = 'table-row';
            readingRow.style.display = 'table-row';
            meaningRow.style.display = 'table-row';
            contactItemRow.style.display = 'table-row';
        }
    });
});
