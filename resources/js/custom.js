const { handleViewBtn, handleDeleteBtn, handleItemDeleteBtn } = require("./_partials/category");

$(function () {
    // category
    $(".viewBtn").click(handleViewBtn);
    $(".deleteBtn").click(handleDeleteBtn);
    $(".deleteItemBtn").click(handleItemDeleteBtn);
});