
function handleViewBtn() {
    const id = $(this).closest('tr').data('id');
    axios.get(`category/fetch-details/${id}`)
        .then(function (response) {
            var html = "";
            const data = response.data.data;
            html += `<h5 class="text-center parent_category_name">Name: ${data.name}</h5>`;
            html +=
                `<p class="text-center text-muted">Status: <span class="badge badge-info">${data.status}</span></p>`;
            html += `<ul class="list-group list-group-unbordered mb-3 px-3">
                        <li class="list-group-item">
                             <b>#sl</b> <b class="float-right">Name</b>
                        </li>
                        `;

            data.sub_categories.forEach((element, index) => {
                html += `<li class="list-group-item">
                             <b>${index + 1}</b> <p class="float-right">${element.name}</p>
                        </li>`;
            });
            html += `</ul>`;
            $(".box-category").html(html);
        });
}


function handleDeleteBtn() {
    const id = $(this).closest('tr').data('id');
    Swal.fire(
        'Data Add Successfully!',
        'You clicked the button!',
        'success'
    )
    Swal.fire({
        title: 'Are you sure?',
        text: "You can't bring it back and all sub categories of this category will be deleted!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            axios.delete(`category/delete/parent/${id}`)
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

function handleItemDeleteBtn() {
    var id = $(this).data('sub_cat_id');
    console.log(id);
    Swal.fire({
        title: 'Are you sure?',
        text: "You can't bring it back and all sub categories of this category will be deleted!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            axios.delete(`/category/delete/child/${id}`)
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

const handleDataTable = () => {
    $('#categoryTable').DataTable();
}

export function categoryApp() {
    // category
    $(".categoryViewBtn").click(handleViewBtn);
    $(".categoryDeleteBtn").click(handleDeleteBtn);
    $(".categoryDeleteItemBtn").click(handleItemDeleteBtn);
    handleDataTable();
}