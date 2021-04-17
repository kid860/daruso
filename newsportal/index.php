<?php 
  error_reporting(E_ALL ^ E_WARNING);
  header("Location: ../");
  include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DARUSO News Portal | Home Page</title>
    

    <!-- Custom styles for this template -->
    <!-- <link href="newsportal/css/modern-business.css" rel="stylesheet"> -->

  </head>

  <body>

    <div class="container" style="margin-top: 4%">
      <!-- Blog Post -->
      <?php 
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 4;
        $offset = ($pageno-1) * $no_of_records_per_page;


        $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
        $result = mysqli_query($con,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        $query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
      ?>

      <center>
        <div class="mb-4 w-75">
          <form name="search" action="newsportal/search.php" method="post">
            <div class="input-group">
        
              <input type="text" name="searchtitle" class="form-control search-daruso" placeholder="Search News..." required>
              <button class="btn-daruso text-light px-4" type="submit"><i class="fa fa-search"></i></button>
            </div>
          </form>
        </div>
    
        
      </center>

      <div class="row container news-container">
        <?php
          while ($row=mysqli_fetch_array($query)) {
        ?>
          <div class="col-12 px-5 " data-aos="fade-right" data-aos-delay="200">
            <div class="row no-gutters overflow-hidden flex-md-row mb-5 shadow-md h-md-200 position-relative">
              <div class="col-4">
                <a href="newsportal/news-details.php?nid=<?php echo htmlentities($row['pid'])?>">
                  <img class="bd-placeholder-img" src="newsportal/admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
                </a>
              </div>

              <div class="col-8 d-none d-lg-block p-4" style="background-color: rgba(0, 123, 255, 0.041); border-left: 5px solid rgb(0, 123, 255);">
                <div class="d-flex justify-content-between mb-3">
                  <div class="text-small d-flex">
                    <div class="mr-2">
                      <div class="mb-1 text-muted"><?php echo htmlentities($row['postingdate']);?></div>
                    </div>
                  </div>
                </div>
                <strong class="d-inline-block text-primary">
                  <a href="category.php?catid=<?php echo htmlentities($row['cid'])?>"><?php echo htmlentities($row['category']);?></a>
                </strong>
                <p class="flex-grow-1">
                  <h5 class="mb-0"><?php echo htmlentities($row['posttitle']);?></h5><br>
                </p>
                <div class="d-flex align-items-center mt-3">
                  <a href="newsportal/news-details.php?nid=<?php echo htmlentities($row['pid'])?>" class="stretched-link"><u>Continue reading &#187;</u></a>
                </div>
              </div>

            </div>
          </div>
        <?php } ?>
      </div>

      <!-- Categories Widget -->
            <center><ul class="row justify-content-md-center list-unstyled my-4 w-100">
              <?php $query=mysqli_query($con,"select id,CategoryName from tblcategory");
              while($row=mysqli_fetch_array($query))
              {
              ?>
                <li class="col- p-3" style="font-size: 12px">
                  <a class="rounded btn-outline-primary p-2" href="newsportal/category.php?catid=<?php echo htmlentities($row['id'])?>"><?php echo htmlentities($row['CategoryName']);?></a>
                </li>
              <?php } ?>
            </ul></center>
    </div>

  </body>

</html>