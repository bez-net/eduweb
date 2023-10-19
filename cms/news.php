<?php
// Start session
session_start();

// Get data from session
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';

// Get status from session
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $status = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}

$postData = array();
if(!empty($sessData['postData'])){
    $postData = $sessData['postData'];
    unset($_SESSION['postData']);
}

// If the user already logged in
if(!empty($sessData['userLoggedIn']) && !empty($sessData['userID'])){
    include_once 'User.class.php';
    $user = new User();
    $conditions['where'] = array(
        'id' => $sessData['userID']
    );
    $conditions['return_type'] = 'single';
    $userData = $user->getRows($conditions);
}
?>
 <?php if(!empty($userData)){ ?><?php
// File uploading script
include 'upload.php';
?>

<!doctype html>
<html class="no-js" lang="">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>News aAlert | Light house academy</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="css/main.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="fonts/flaticon.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="css/animate.min.css">
    <!-- Date Picker CSS -->
    <link rel="stylesheet" href="css/datepicker.min.css">
    <!-- Select 2 CSS -->
    <link rel="stylesheet" href="css/select2.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Modernize js -->
    <script src="js/modernizr-3.6.0.min.js"></script>
</head>

<body>
    <!-- Preloader Start Here -->
        <?php include "header.php";?>
            <!-- Sidebar Area End Here -->
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Notice Board</h3>
                    <ul>
                        <li>
                            <a href="index-2.html">Home</a>
                        </li>
                        <li>Notice</li>
                    </ul>
                </div><style>
.upfrm{
    float: left;
    width: 100%;
    margin-bottom: 20px;
}
.div-center img, .div-center embed{
    margin-top: 20px;
}
.upfrm label{
    font-weight: bold;
}
.upfrm input[type="file"]{
    display: inline-block;
    border: 1px solid;
    padding: 5px;
    border-radius: 2px;
}
.upfrm input[type="submit"]{
    display: inline-block;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    border: 1px solid transparent;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: .25rem;
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
    cursor: pointer;
}
.upfrm input[type="submit"]:hover {
    color: #fff;
    background-color: #0069d9;
    border-color: #0062cc;
}</style>
                <!-- Bread Area End Here -->
                <div class="row">
                    <!-- Add Notice Area Start Here -->
                    <div class="col-4-xxxl col-12">
                        <div class="card height-auto">
                            <div class="card-body">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Create News Alert</h3>
                                    </div>
                                     <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" 
                                        data-toggle="dropdown" aria-expanded="false">...</a>
                
                                      
                                    </div>
                                </div>






<div class="upfrm">
<?php if(!empty($statusMsg)){ ?>
            <p class="status-msg"><?php echo $statusMsg; ?></p>
        <?php } ?>
                                <form class="new-added-form" action="" method="post" enctype="multipart/form-data" >
                                    <div class="row">
                                        <div class="col-12-xxxl col-lg-12 col-12 form-group">
                                            <label>Title</label>
                                            <input type="text" placeholder="" class="form-control" name="title">
                                        </div>
                                        
                                       
                                        
<input type="hidden"  name="groupid" value="<?php echo uniqid();?>">
                                       <div class="col-12-xxxl col-lg-12 col-12 form-group">
                                            <label>Attach Image</label>
                                        <input type="file" name="images[]" class="form__field__img" multiple>
                                    
                                        </div>


<?php// echo $_POST['groupid'];?>

                                         <div class="col-12 form-group">
                                            <label>Details</label>
                                            <textarea class="textarea form-control" name="details" id="form-message" cols="10"
                                            rows="9"></textarea>
                                        </div>
                                        <div class="col-12 form-group mg-t-8">



                                            <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" name="submit">Save</button>
                                            <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                                        </div>
                                    </div>
                                </form>  </div>
                            </div>
                        </div>
                    </div>


                        <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
               
                <!-- Breadcubs Area End Here -->
                <!-- Teacher Table Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                       
                        
                        <div class="table-responsive">
                            <table class="table display data-table text-nowrap">
                                <thead>
                                    <tr>
                                        <th> 
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input checkAll">
                                                <label class="form-check-label">ID</label>
                                            </div>
                                        </th>
                                        <th>Title</th>
                                         <th>Details</th>
                                        <th>Creating Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <div class="gallery">
                <h2>Uploaded Images</h2>
                <?php include 'dbConfig.php';
                    $query = $db->query("SELECT * FROM images where category='0' GROUP BY groupid ORDER BY uploaded_on DESC");
                    if($query->num_rows > 0){
                        while($row = $query->fetch_assoc()){
                            $imageURL = $row["file_name"];
                        ?>
                             <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input">
                                                <label class="form-check-label">#0022</label>
                                            </div>
                                        </td>
                                        <td><?php echo $row['title'];?></td>
                                        
                                        <td><?php echo $row['details'];?></td>
                                        <td><?php echo $row['uploaded_on'];?></td>
                                         <td>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    <span class="flaticon-more-button-of-three-dots"></span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="delete.php?groupid=<?php echo $row['groupid'];?>"><i class="fas fa-times text-orange-red"></i>Delete</a>
                                                   
                                                    <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                        <?php }
                    }else{ ?>
                        <p>Nothing found...</p>
                <?php } ?>
            </div>

                                  
                             
                                </tbody>
                            </table>
                        </div>
               
          
                    <!-- Add Notice Area End Here -->
                    <!-- All Notice Area Start Here -->
                    
                    <!-- All Notice Area End Here -->
                </div>
                <?php include 'footer.php';?>
            </div>
        </div>
        <!-- Page Area End Here -->
    </div>
    <!-- jquery-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Select 2 Js -->
    <script src="js/select2.min.js"></script>
    <!-- Scroll Up Js -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- Date Picker Js -->
    <script src="js/datepicker.min.js"></script>
    <!-- Custom Js -->
    <script src="js/main.js"></script>

</body>

  <?php }else{ 
     header("location:login.php"); } ?>


</html>