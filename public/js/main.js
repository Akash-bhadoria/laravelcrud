


function addNewProduct() {
    let product_name = $("#name").val(),
        product_price = $("#price").val(),
        product_description = $("#description").val();

    axios.post('/add-new-product', { product_name, product_price, product_description })
        .then(res => {
            // console.log(res.data);
            $("#name").val("");
            $("#price").val("");
            $("#description").val("");
            fetchAllProducts();
            $("#myModal").modal('hide');
        })
        .catch(err => {
            console.error("An error occurred " + err);
        })
        // .finally(() => {

        // })
}

// DATA ----> VARIABLE -----> TABLE
// PHP
// foreach($products as $product)
function fetchAllProducts()
{
    let a = 1;
    let tableData = "";
    axios.get('/fetch-all-product')
    .then(res=> {
        // console.log(res.data.data)
        if (res.data.data.length > 0) {
            res.data.data.forEach(product => {
                tableData += `
                                <tr>
                                    <td>${a++}</td>
                                    <td>${product.product_name}</td>
                                    <td>${product.product_price}</td>
                                    <td>${product.product_description}</td>
                                    <td>
                                    <a type="button" class="btn btn-success" onclick="editProduct(${product.id})" >Edit</a>
                                    <a type="button" class="btn btn-danger" onclick="deleteProduct(${product.id})" >Delete</a>
                                    </td>
                                </tr>
                            `;
            })

            $("#productsTable tbody").html(tableData)
        }
    })
    .catch(err => {
        console.error("An error occurred " + err);
    })
}

function editProduct(id) {
    axios.post('/get-product',{id})
    .then(res=>{
         console.log(res.data)
            $('#edit_description').val(res.data.data.product_description)
            $('#edit_price').val(res.data.data.product_price)
            $('#edit_name').val(res.data.data.product_name)
            $('#edit_id').val(res.data.data.id)
            $("#editProductModal").modal('show');
    })
    .catch(err => {
        console.error("An error occurred " + err);
    })
    
}

function updateProduct(){
    let product_id = $("#edit_id").val(),
        product_name = $("#edit_name").val(),
        product_price = $("#edit_price").val(),
        product_description = $("#edit_description").val();

        axios.post('/add-edit-product', { product_name, product_price, product_description, product_id })
        .then(res => {
            fetchAllProducts();
            $("#editProductModal").modal('hide');
        })
        .catch(err => {
            console.error("An error occurred " + err);
        })
}

function deleteProduct(id){
    axios.post('/delete-product',{id})
    .then(res => {
        console.log(res.data.data);
       fetchAllProducts();
   })
   .catch(err => {
       console.error("An error occurred " + err);
   })
}