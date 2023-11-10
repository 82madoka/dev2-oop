<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Activity</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <h1 class="display-4 fw-bold text-center-mt-5">Employee Activity</h1>
        <div class="container">
            <div class="row mt-5">
                <div class="col-4">
                 
            <form action="" method="post">
                <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Name</label>
                        <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="mb-3">
                        <label for="civil_status" class="form-label fw-bold">Civil Status</label>
                        <select name="civil_status" class="form-select" id="civil_status">  
                            <option hidden>Select your civil status</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                         </select>
                </div>
                <div class="mb-3">
                    <label for="position" class="form-label fw-bold">Position</label>
                    <select name="position" id="position" class="form-select">
                        <option hidden>Select your Position</option>
                        <option value="Staff">Staff</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>
                <div class="mb-3">
                        <label for="employment_status" class="form-label">Employee Status</label>
                        <select name="employment_status" id="employment_status" class="form-select" required>
                            <option disabled selected>Select Employment Status</option>
                            <option value="Contractual">Contractual</option>
                            <option value="Probationary">Probationary</option>
                            <option value="Regular">Regular</option>
                        </select>
                </div>
                <div class="mb-3">
                    <label for="regular_hour" class="form-label">Regular Hour Rendered</label>
                    <input type="number" name="regular_hours_rendered" id="regular_hour_rendered" class="form-control" min="0" max="40" required>
                </div>
                <div class="mb-3">
                    <label for="ot_hour" class="form-label">Over Time Hour</label>
                    <input type="number" name="ot_hour_rendered" id="ot_hour_rendered" class="form-control" min="0">
                </div>
                <button type="submit" name="btn_submit" class="btn btn-success w-100">Submit</button>
                
                
            </form>
        </div> 
        <div class="col-8">
            <?php
            include "Employee.php";

            if(isset($_POST['btn_submit'])){
                //collect data from form
                $name = $_POST['name'];
                $civil_status = $_POST['civil_status'];
                $position = $_POST['position'];
                $employment_status = $_POST['employment_status'];
                $regular_hours_rendered = $_POST['regular_hours_rendered'];
                $ot_hour_rendered = $_POST['ot_hour_rendered'];

                // echo $name."<br>";
                // echo $civil_status."<br>";
                // echo $position."<br>";
                // echo $employment_status."<br>";
                // echo $regular_hours_rendered."<br>";
                // echo $ot_hour_rendered."<br>";

                $employee_obj = new Employee($civil_status, $position, $employment_status, $regular_hours_rendered, $ot_hour_rendered);

                ?>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th class="bg-dark text-white w-25">Full Name</th>
                        <td><?= $name ?></td>
                    </tr>
                    <tr>
                        <th class="bg-dark text-white w-25">Civil Status</th>
                        <td><?= $civil_status ?></td>
                    </tr>
                    <tr>
                        <th class="bg-dark text-white w-25">Position</th>
                        <td><?= $position ?></td>
                    </tr>
                    <tr>
                        <th class="bg-dark text-white w-25">Employment Status</th>
                        <td><?= $employment_status ?></td>
                    </tr>
                    <tr>
                        <th class="bg-dark text-white w-25">Gross Income</th>
                        <td><?= $employee_obj->getGrossIncome() ?>
                        <br>
                        <small class="text-muted fst-italic">
                            <?="Regular Pay: (" . $regular_hours_rendered. "hrs x ". $employee_obj->getRegularRate(). "/day + OT pay: ". $ot_hour_rendered . "hrs x". $employee_obj->getOTRate() . "/hr)" ?>
                        </small>
                    
                    </td>
                    </tr>
                    <tr>
                        <th class="bg-dark text-white">Net Income</th>
                        <td>
                        <?= $employee_obj->getNetIncome() ?>
                        <br>
                        <?= "Gross Income: (" . 
                        number_format($employee_obj->getGrossIncome(),2). ") - (Tax: ". 
                        number_format($employee_obj->getTax(),2). "+ Health care: " .
                        number_format($employee_obj->getHealthcare(),2). ")"
                        ?>
                        </td>
                    </tr>
                </table>

                <?php

            }
            
            
            ?>
        </div>  
     </div>
    </div>
    
    
</body>
</html>