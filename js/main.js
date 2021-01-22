let checkboxes = document.querySelectorAll('.checkbox');
checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', () => {
        checkbox.parentNode.submit();
    });
});

let deleteItems = document.querySelectorAll('.delete');
deleteItems.forEach(deleteItem => {
    deleteItem.addEventListener('click', (event) => {
        if (!confirm('削除してよろしいでしょうか?')) {
            event.preventDefault();
            return;
        }
    });
});

let allDelete = document.querySelector('.all-delete');
allDelete.addEventListener('click', (event) => {
  if (!confirm('削除してよろしいでしょうか?')) {
    event.preventDefault();
    return;
  }
});
