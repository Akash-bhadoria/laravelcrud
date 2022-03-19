@extends('layout')
@include('sidebar')


<!DOCTYPE html>
<html lang="en">
  <head>
    <style>
      h2{
        font-family: Georgia, 'Times New Roman', Times, serif;
      }
      h4{
        font-family: Georgia, 'Times New Roman', Times, serif;
      }
    </style>
  </head>
<body style="font-family: Georgia, 'Times New Roman', Times, serif">

    <div class="container mt-3">
        <h2>Product Form</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
          Add Product
        </button>

        <hr>
      </div>
      
      <!-- The Modal -->
      <div class="modal" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Form</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
      
            <!-- Modal body -->
            <div class="modal-body">
                {{-- <form  id="addProductForm"> --}}
                    {{-- Cross site request forgery --}}
                    {{-- @csrf --}}
                  <div class="mb-3 mt-3">
                    <label for="email">Product Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Product Name" name="product_name">
                  </div>
                  <div class="mb-3">
                    <label for="pwd">Product Price:</label>
                    <input type="number" class="form-control" id="price" placeholder="Enter Product Price" name="product_price" step="0.01" min="0.00">
                  </div>
                  <div class="mb-3">
                    <label for="pwd">Product Description:</label>
                    <textarea type="text" class="form-control" id="description" placeholder="Enter Product Description" name="product_description"></textarea>
                  </div>
                  <button type="button" class="btn btn-primary" onclick="addNewProduct()">Add Product</button>
                {{-- </form> --}}
            </div>
      
            <!-- Modal footer -->
            <div class="modal-footer">
              {{-- <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button> --}}
            </div>
      
          </div>
        </div>
      </div>


      <div class="modal" id="editProductModal">
        <div class="modal-dialog">
          <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Edit Product</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
      
            <!-- Modal body -->
            <div class="modal-body">
                <input type="hidden" name="product_id" id="edit_id">
                  <div class="mb-3 mt-3">
                    <label for="email">Product Name:</label>
                    <input type="text" class="form-control" id="edit_name" placeholder="Enter Product Name" name="product_name">
                  </div>
                  <div class="mb-3">
                    <label for="pwd">Product Price:</label>
                    <input type="number" class="form-control" id="edit_price" placeholder="Enter Product Price" name="product_price" step="0.01" min="0.00">
                  </div>
                  <div class="mb-3">
                    <label for="pwd">Product Description:</label>
                    <textarea type="text" class="form-control" id="edit_description" placeholder="Enter Product Description" name="product_description"></textarea>
                  </div>
                  <button type="button" class="btn btn-primary" onclick="updateProduct()">Update Product</button>
                {{-- </form> --}}
            </div>
      
            <!-- Modal footer -->
            <div class="modal-footer">
              {{-- <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button> --}}
            </div>
      
          </div>
        </div>
      </div>
      <br>
      <div class="container mt-3">
        <h2>Product Record</h2>   
        <hr>      
        <table class="table table-bordered" id="productsTable">
          <thead>
            <tr>
              <th>S.no</th>
              <th>Product Name</th>
              <th>Product price</th>
              <th>Product Description</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{++$loop->index}}</td>
                    <td>{{$product->product_name}}</td>
                    <td>{{$product->product_price}}</td>
                    <td>{{$product->product_description}}</td>
                    <td>
                        <a type="button" class="btn btn-success" onclick="editProduct({{ $product->id }})">Edit</a>
                        <a type="button" class="btn btn-danger" onclick="deleteProduct({{ $product->id }})">Delete</a>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      
    
</body>
</html>