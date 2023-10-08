<html>
    <head>
        <title>
            Beauty Parlor
        </title>
    </head>
    <body>
        <center>
            <form action="" method="post">
                <h1>Beauty Products</h1>
                <table>
                    <tr>
                        <td>Product ID</td>
                        <td><input type="number" name="pid" required></td>   
                    </tr>
                    <tr>
                        <td>Product Name</td>
                        <td><input type="text" name="pname" required></td>   
                    </tr>
                    <tr>
                        <td>Product Category</td>
                        <td>
                            <select name="pcategory">
                                <option name="skin_care">Skin Care</option>
                                <option name="make_up">Make Up</option>
                                <option name="hair_care">Hair Care</option>
                                <option name="daily">Daily Essential</option>
                                <option name="frag">Fragrances</option>
                            </select>
                        </td>   
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><input type="text" name="pdes" required></td>   
                    </tr>
                    <tr>
                        <td>Company</td>
                        <td><input type="text" name="pcompany" required></td>   
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td><input type="number" name="pprice" required></td>   
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="btn_add" value="Add Product"></td>   
                    </tr>
                </table>
            </form>

            <form action="" method="post">
                <table>
                    <tr>
                        <td>Serach Category Wise</td>
                        <td>
                        <select name="search_category[]">
                                <option name="skin_care">Skin Care</option>
                                <option name="make_up">Make Up</option>
                                <option name="hair_care">Hair Care</option>
                                <option name="daily">Daily Essential</option>
                                <option name="frag">Fragrances</option>
                            </select>
                        </td>
                        <td><input type="submit" name="btn_search" value="Search"/></td>
                    </tr>
                </table>
            </form>
        </center>   
    </body>   
</html>
<?php
include 'init.php';

    if(isset($_POST['btn_search'])){

        foreach($_POST['search_category'] as $sort){
            if($sort == 'Skin Care'){
                $sql = "select * from $product";
                $queryExe = mysqli_query($con,$sql);
                $data = mysqli_num_rows($queryExe);
            }
            ?>
            <center>
                <table border=1px>
                    <tr>
                        <th>Product ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Company</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                    <?php
                        include "init.php";
                        foreach($_POST['search_category'] as $sort){
                            if($sort == 'Skin Care'){
                                $sql = "select * from $product where $pcategory = '$sort'";
                                $queryExe = mysqli_query($con,$sql);
                                $data = mysqli_num_rows($queryExe);
                            } else if($sort == 'Make Up'){
                                $sql = "select * from $product where $pcategory = '$sort'";
                                $queryExe = mysqli_query($con,$sql);
                                $data = mysqli_num_rows($queryExe);
                            } else if($sort == 'Hair Care'){
                                $sql = "select * from $product where $pcategory = '$sort'";
                                $queryExe = mysqli_query($con,$sql);
                                $data = mysqli_num_rows($queryExe);
                            } else if($sort == 'Daily Essential'){
                                $sql = "select * from $product where $pcategory = '$sort'";
                                $queryExe = mysqli_query($con,$sql);
                                $data = mysqli_num_rows($queryExe);
                            }else if($sort == 'Fragrances'){
                                $sql = "select * from $product where $pcategory = '$sort'";
                                $queryExe = mysqli_query($con,$sql);
                                $data = mysqli_num_rows($queryExe);
                            }
                        }
                        if($data)
                        {
                            while($row = mysqli_fetch_array($queryExe)){
                                ?>
                                    <tr>
                                        <td><?php echo $row[$pid]; ?></td>     
                                        <td><?php echo $row[$pname]; ?></td>     
                                        <td><?php echo $row[$pcategory]; ?></td>     
                                        <td><?php echo $row[$pdes]; ?></td>     
                                        <td><?php echo $row[$pcompany]; ?></td>     
                                        <td><?php echo $row[$pprice]; ?></td>     
                                        <td><a href="update.php?pid=<?php echo $row[$pid]; ?>">Update</a></td>     
                                    </tr>
                                <?php
                            }
                        }
                    ?>
                </table>
            </center>
            <?php
        }
    } else {
        include 'init.php';
        $create  = "create table if not exists $product(
            $pid integer primary key,
            $pname text,
            $pcategory varchar(128),
            $pdes text,
            $pcompany text,
            $pprice text        
        )";
        $queryExe = mysqli_query($con,$create);

        if(isset($_POST['btn_add'])){

            $product_id = $_POST[$pid];
            $product_name = $_POST[$pname];
            $product_category = $_POST[$pcategory];
            $product_des = $_POST[$pdes];
            $product_company = $_POST[$pcompany];
            $product_price = $_POST[$pprice];

            $sql = "select * from $product where $pid = $product_id";
            $queryExe = mysqli_query($con,$sql);
            $data = mysqli_num_rows($queryExe);

            if($data){
                ?> 
                    <script>
                        alert("Product Already Exists")
                    </script>
                <?php
            } else {

                $insert = "insert into $product values($product_id,'$product_name','$product_category','$product_des','$product_company',$product_price)";
                $queryExe = mysqli_query($con,$insert);

                if($queryExe)
                {
                    ?> 
                        <script>
                            alert("Product Added")
                            window.open("http://localhost/paper7/index.php","_self")
                        </script>
                    <?php
                }

            }

        }
        ?>
            <center>
                <table border=1px>
                    <tr>
                        <th>Product ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Company</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                    <?php
                        include "init.php";
                        $sql = "select * from $product";
                        $queryExe = mysqli_query($con,$sql);
                        $data = mysqli_num_rows($queryExe);
                        if($data)
                        {
                            while($row = mysqli_fetch_array($queryExe)){
                                ?>
                                    <tr>
                                        <td><?php echo $row[$pid]; ?></td>     
                                        <td><?php echo $row[$pname]; ?></td>     
                                        <td><?php echo $row[$pcategory]; ?></td>     
                                        <td><?php echo $row[$pdes]; ?></td>     
                                        <td><?php echo $row[$pcompany]; ?></td>     
                                        <td><?php echo $row[$pprice]; ?></td>     
                                        <td><a href="update.php?pid=<?php echo $row[$pid]; ?>">Update</a></td>     
                                    </tr>
                                <?php
                            }
                        }
                    ?>
                </table>
            </center>
        <?php
    }
?>