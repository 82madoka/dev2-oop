
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
    <div class="card mt-5 mx-auto w-50">
    <div class="card-header">
        <h3 class="">School Activity</h3>
    </div>
    <div class="card-body">
        <form action="" method="post">
         <div class="mb-3">
           <label for="name">Name</label><br>
           <input type="text" name="name" class="w-100 form-control" placeholder="Name">
         </div>
         <div class="mb-3">
           <label for="year">Year level</label><br>
           <select name="year" id="year" class="form-select">
                <option hidden>Select year level</option>
                <option value="1st">1st Year Level</option>
                <option value="2nd">2nd Year Level</option>
                <option value="3rd">3rd Year Level</option>
                <option value="4th">4th Year Level</option>
           </select>
         </div>
         <div class="mb-3">
           <label for="units">Number of Units</label><br>
           <input type="number" name="units" class="w-100 form-control" placeholder="Number of Units">
         </div>
         <div class=" mb-3">
            <div class="form-check form-check-inline">
                <input type="radio" id="with_lab" name="laboratory" class="form-check-input" value="with_lab">
                <label for="with_lab" class="form-check-label">With Laboratory</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" id="without_lab" name="laboratory" class="form-check-input" value="without_lab">
                <label for="without_lab" class="form-check-label">Without Laboratory</label>
            </div>
         </div>
         <div class="col">
            <button class="submit btn btn-dark w-100 mt-3" name="btn_submit">Submit</button>
         </div>

        </form>
    </div>
</div>
        <?php
            include "school.php";
            if(isset($_POST['btn_submit'])){
                $name = $_POST['name'];
                $year = $_POST['year'];
                $units = $_POST['units'];
                $laboratory = $_POST['laboratory'];
                $school_obj = new School($year,$units,$laboratory);
            ?>
            <div class="card mt-5 mx-auto w-50">
                <div class="card-header">
                    <h3 class="">Student</h3>
                </div>
                <div class="card-body">
                <p>Student Name: <?= $name ?> </p>
                <p>Year Level:  <?= $year ?> </p>
                <p>No. of Units: <?= $units ?>  </p>
                <p>Laboratory:  <?= $laboratory ?> </p>
                <p>Total: <?= $school_obj->getTotalPrice() ?>  </p>
                    </div>
                </div>
            <?php
                }    
            ?>
        
    </body>
    </html>


    



