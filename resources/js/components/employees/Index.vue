<template>
  <div>
         <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Employees</h1>
        </div>
<div class="card">
    <div class="card-header">

        <div class="row">
            <div class="col">
                <form>
                    <div class="form-row align-items-center">
                        <div class="col">
                            <input type="search" name="search" class="form-control mb-2" id="inlineFormInput" placeholder="John Doe">
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary mb-2">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div>
            <a href=" " class="btn btn-primary float-right mb-2">Create</a>
        </div>
         </div>
    <div class="row">

            <div class="alert alert-success">

            </div>

     </div>
    <div class="card-body">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#Id</th>
                <th scope="col">Countries Name</th>
                <th scope="col">Name</th>
                <th scope="col">Manage</th>
              </tr>
            </thead>
            <tbody>

                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td><a href="" class="btn btn-success">Edit</a></td>
                  </tr>



            </tbody>
          </table>
    </div>
</div>
</div>
</template>

<script>
export default {

}
</script>

<style>

</style>
