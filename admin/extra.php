<?php
                      
                    $con=mysqli_connect("localhost","root","","perfect",3307);
                    $rs=mysqli_query($con,"select * from product");
                    if($rs){
                        if(mysqli_num_rows($query)>0){
                            $row=mysqli_fetch_assoc($query);
                            $id=$row['id'];
                            $name=$row['name'];
                            $p=$row['price'];
                            $i=$row['image'];
                            $q=$row['quantity'];
                            $d=$row['description'];
                    }
                  }
                  ?>
                      
                    
value="<?php echo $id;?>"
value="<?php echo $name;?>" 
value="<?php echo $p;?>" 
value="<?php echo $q;?>"
value="<?php echo $d;?>"