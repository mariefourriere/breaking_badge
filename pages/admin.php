<?php 
if(isset($_POST['badgeName'])){
    createBadge();
}
if(isset($_POST['grantBadgeName'])) {
    grantBadgeToUser();
}

?>




<!-- BADGES Modals -->

<!-- MODAL GRANT BADGE TO USER -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
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
                            <label for="grantBadgeName">Badge</label>
                            <select id="grandtBadgeName" class="form-control" name="grantBadgeName" required>
                                <option value="">Choose...</option>
                                <?php 
                                    foreach(_getAllBadges() as $results_badges){ 
                                    ?>
                                <option value="<?= $results_badges['id_badge']?>"><?= $results_badges['name_badge']?></option>
                                <?php 
                                    }
                                    ?>

                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6 col-md-6">
                            <label for="grantedUser">User</label>
                            <select id="grantedUser" class="form-control" name="grantedUser" required>
                                <option value="">Choose...</option>

                                <?php 
                                    foreach(getUsers() as $results_users){ 
                                    ?>
                                <option value="<?= $results_users['id']?>"><?= $results_users['firstname'].' '.$results_users['lastname']?></option>
                                
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

<!-- MODAL CREATE NEW BADGE -->


<!-- Modal -->
<div class="modal fade" id="createBadgeModal" tabindex="-1" role="dialog" aria-labelledby="createBadgeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createBadgeModalLabel">Create New Badge</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="createBadgeForm">
                
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="badgeName">Badge Name</label>
                            <input type="text" name="badgeName" class="form-control" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="badgeShape">Shape</label>
                            <input type="text" name="badgeShape" class="form-control" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="badgeColor">Color HEX</label>
                            <input type="color" value="#e74a3b" name="badgeColor" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-12">
                            <label for="badgeDesc">Description</label>
                            <textarea class="form-control" name="badgeDesc" form="createBadgeForm" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" value="save">Save</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>







<div class="container-fluid">
    <div class="row">
        <div class="col-4">
            <h3 class="text-dark mb-4">Badges</h3>
        </div>
        <div class="col-8 d-flex justify-content-end">
            <button type="button" class="btn btn-danger m-3" data-toggle="modal" data-target="#createBadgeModal"><i
                    class="fa fa-plus"></i> Create Badge</button>
            <button type="button" class="btn btn-danger m-3" data-toggle="modal" data-target="#myModal">
                <i class="fa fa-plus"></i> Grant Badge </button>

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
        
        
        
        foreach(getBadges() as $resultat){ ?>
                        <tr>
                            <td><?= $resultat['name_badge']?></td>
                            <td><?= $resultat['description_badge']?><br></td>
                            <td><a href="updateform.php?badgeId=<?= $resultat['id_badge']?>" title="Edit"><i
                                        class="fa fa-edit"></i></a>
                                <a href="delete.php?badgeId=<?= $resultat['id_badge']?>" title="Delete"><i
                                        class="fa fa-trash"></i></a></td>
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
                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 5
                        of
                        15</p>
                </div>
                <div class="col-md-6">
                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                        <ul class="pagination">
                            <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span
                                        aria-hidden="true">«</span></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span
                                        aria-hidden="true">»</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-4">
            <h3 class="text-dark my-5">Normies</h3>
        </div>
        <div class="col-8 d-flex justify-content-end">
            <button type="button" class="btn btn-danger my-5" data-toggle="modal" data-target="#addUserModal"><i
                    class="fa fa-plus"></i> Add New Normie</button>
        </div>





        <!-- Modal -->
        <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addUserModalLabel">Add New Normie</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="firstname">Firstname</label>
                                    <input type="text" name="firstname" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lastname">Lastname</label>
                                    <input type="text" name="lastname" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>

                            </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" value="save">Save</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>

        <!-- SHOW ALL THE BADGES-->

    </div>
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-danger m-0 font-weight-bold"> All Normies</p>
        </div>
        <div class="card-body">
            <div class="row">


            </div>
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">

                <table class="table my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Acquired Badges</th>
                            <td><strong>Action</strong></td>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach(acquiredBadges() as $acquired_badges){ ?>
                        <tr>
                            <td><?= $acquired_badges['firstname']?></td>
                            <td><?= $acquired_badges['lastname']?><br></td>
                            <td><?= $acquired_badges['name_badge']?></td>
                            <td><a href="deleteacquiredbadge.php?badgeId=<?= $acquired_badges['badge_id']?>" title="Delete"><i
                                        class="fa fa-trash"></i></a>
                            <td> 
                        </tr>

                        <?php } ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Acquired Badges</th>
                            <td><strong>Action</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="row">
                <div class="col-md-6 align-self-center">
                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 5
                        of
                        15</p>
                </div>
                <div class="col-md-6">
                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                        <ul class="pagination">
                            <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span
                                        aria-hidden="true">«</span></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span
                                        aria-hidden="true">»</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>


