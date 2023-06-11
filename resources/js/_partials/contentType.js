function handleContentTypeUpdateBtn() {
    console.log("update btn clicked");
    $('#create-content-type').modal('show');


}

function handleContentTypeDeleteBtn() {
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


const contentTypeHideModal = () => {
    $('#create-content-type').modal('hide');
}

export const contentTypeApp = () => {
    $(".contentOwnerDeleteBtn").click(handleContentTypeDeleteBtn);
    $(".contentTypeUpdateBtn").click(handleContentTypeUpdateBtn);
    $(".close").click(contentTypeHideModal);
    $(".closeModal").click(contentTypeHideModal);
}