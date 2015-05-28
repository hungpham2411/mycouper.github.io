function deleteMenuItem(event) {
    var menuItemId = event.target.dataset.id;
    var confirmDelete = false;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.check == true) {
                confirmDelete = confirm("Bạn chắc chắn muốn xóa menu này!");
            } else {
                alert("Không thể xóa menu có chứa submenu!");
            }
        }
    };
    xhr.open("get", "php/check_delete_menu_item.php?id=" + menuItemId, false);
    xhr.send();
    if (confirmDelete == false) {
        event.preventDefault();
    }
}

function addEventListeners() {
    document.addEventListener("DOMContentLoaded", function () {
        var menuDeleteButtons = document.querySelectorAll(".menu-delete");
        for (var i = 0; i < menuDeleteButtons.length; i++) {
            menuDeleteButtons[i].addEventListener("click", function (event) {
                deleteMenuItem(event);
            });
        }
    });
}

addEventListeners();