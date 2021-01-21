 <?php 
 getUsers();
 getBadges();
 
 ?>


    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Grant badge to user</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="mealcategory">Badge</label>
                                <select id="mealcategory" class="form-control" name="category">
                                    <option selected>Choose...</option>
                                    <?php 
                                    foreach(getBadges() as $results_badges){ 
                                    ?>
                                    <option><?= $results_badges['name_badge']?></option>
                                    <?php 
                                    }
                                    ?>
                                
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6 col-md-6">
                            <label for="mealcategory">User</label>
                                <select id="mealcategory" class="form-control" name="category">
                                    <option selected>Choose...</option>

                                    <?php 
                                    foreach(getUsers() as $results_users){ 
                                    ?>
                                    <option><?= $results_users['firstname'].' '.$results_users['lastname']?></option>
                                    <?php 
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class=" form-group modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger" name="save">Save changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




<div class="container-fluid">
<div class="row"> 
<div class="col-4"><h3 class="text-dark mb-4">Badges</h3></div>
<div class="col-8 d-flex justify-content-end">
<button type="button" class="btn btn-danger mb-3" data-toggle="modal" data-target="#myModal">
        <i class="fa fa-plus"></i> Grant a badge </button>
</div>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
        aria-hidden="true">
</div>

<!-- SHOW ALL THE BADGES-->

</div>
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-danger m-0 font-weight-bold"> All Badges</p>
        </div>
        <div class="card-body">
            <div class="row">
              

            </div>
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">

                <table class="table my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
        
        $cursor = createCursor();
        $all_badges = $cursor->prepare('SELECT * FROM badge');
        $executeIsOK = $all_badges->execute();
        $result = $all_badges->fetch();
        
        while($resultat = $all_badges->fetch()){ ?>
                        <tr>
                            <td><?= $resultat['name_badge']?></td>
                            <td><?= $resultat['description_badge']?><br></td>
                            <td><a href="update.php?badgeId=<?= $resultat['id_badge']?>" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="delete.php?badgeId=<?= $resultat['id_badge']?>"title="Delete"><i class="fa fa-trash"></i></a></td>
                        </tr>

                        <?php } ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <td><strong>Name</strong></td>
                            <td><strong>Description</strong></td>
                            <td><strong>Action</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="row">
                <div class="col-md-6 align-self-center">
                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of 27</p>
                </div>
                <div class="col-md-6">
                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                        <ul class="pagination">
                            <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

