  <div class="col-md-4">

          <!-- Search Widget -->
          <div class="mb-4">
            <form name="search" action="newsportal/search.php" method="post">
              <div class="input-group">
          
                <input type="text" name="searchtitle" class="form-control" placeholder="Search" required>
                <button class="btn btn-primary px-4" type="submit"><i class="fa fa-search"></i></button>
              </div>
            </form>
          </div>

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="px-4 py-3">Categories</h5>
            <div class="card-body" style="background-color: rgb(247,247,247);">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <?php $query=mysqli_query($con,"select id,CategoryName from tblcategory");
                    while($row=mysqli_fetch_array($query))
                    {
                    ?>
                      <li>
                        <a href="newsportal/category.php?catid=<?php echo htmlentities($row['id'])?>"><?php echo htmlentities($row['CategoryName']);?></a>
                      </li>
                    <?php } ?>
                  </ul>
                </div>
       
              </div>
            </div>
          </div>

          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="px-4 py-3">Recent News</h5>
            <div class="card-body" style="background-color: rgb(247,247,247);">
              <ul style="padding: 20px" class="mb-0">
                <?php
                $x = 1;
                $query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId limit 8");
                while ($row=mysqli_fetch_array($query)) {
                  if($x <= 6){
                  ?>
                  <li style="padding-bottom: 10px;">
                    <a href="newsportal/news-details.php?nid=<?php echo htmlentities($row['pid'])?>"><?php echo htmlentities($row['posttitle']);?></a>
                  </li>
                  <?php 
                  }
                  $x++;
                } ?>
              </ul>
            </div>
          </div>

          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="px-4 py-3">Quick Links</h5>
            <div class="card-body" style="background-color: rgb(247,247,247);">
              <ul style="padding: 20px" class="mb-0">
                  <li style="padding-bottom: 5px;">
                    <a href="https://aris2.udsm.ac.tz/">ARIS</a>
                  </li>
                  <li style="padding-bottom: 5px;">
                    <a href="https://lms.udsm.ac.tz/">Learning Management System (LMS)</a>
                  </li>
                  <li style="padding-bottom: 5px;">
                    <a href="https://timetable.udsm.ac.tz/">UDSM Academic Timetable</a>
                  </li>
              </ul>
            </div>
          </div>

        </div>
