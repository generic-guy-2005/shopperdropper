<div class="container">
    <div class="mt-5" style="margin-bottom:100px;">
        <div class="container mb-5" style="display:flex; gap:20px; justify-content:center;">

            <div class="card p-3" style="width: calc(50% - 10px); border: solid #f0ad4e">
                <h3 style="position:absolute;right:20px">Update Profile</h3>
                <form class="mt-5" action="index.php?folder=account&page=process_account" method="post" enctype="multipart/form-data">
                    <div class="mb-3 mt-3">
                        <label for="text" class="text">Username</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="<?= $_SESSION['name'] ?>">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email" class="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="<?= $_SESSION['email'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="profileimg" class="form-label">Profile Photo</label>
                        <input type="file" class="form-control" name="profileimg" accept="image/jpeg, image/png">
                    </div>
                    <div style="display:flex; justify-content:center; gap:10px">
                        <input type="submit" name="update_profile" id="update_profile" class="btn btn-warning mb-3" value="Update" style="color:white; width:45%">
                        <a href="index.php?folder=account&page=info" class="btn btn-danger" style="height:fit-content; width: 45%">Cancel</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>