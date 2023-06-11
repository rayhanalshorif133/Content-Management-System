function handleContentOwnerDeleteBtn() {
    var id = $(this).parent().attr("data-id");
    console.log(id);
    Swal.fire({
        title: 'Are you sure?',
        text: "You can't bring it back!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            axios.delete(`/content-owner/delete/${id}`)
                .then((result) => {
                    Swal.fire(
                        'Deleted!',
                        result.data.message,
                        'success'
                    );
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                })
        }
    })
}
function handleContentOwnerUpdateBtn() {
    var id = $(this).parent().attr("data-id");
    var name = $(this).closest("tr").find(".content_owner_name").text();
    $("#content_owner_id").val(id);
    $("#updateName").val(name);
}


const handleDataTable = () => {
    $('#contentOwnerTable').DataTable();
}

export const contentOwnerApp = () => {
    $(".contentOwnerUpdateBtn").click(handleContentOwnerUpdateBtn);
    $(".contentOwnerDeleteBtn").click(handleContentOwnerDeleteBtn);
    handleDataTable();
}