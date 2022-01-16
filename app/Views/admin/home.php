<div class="row">

    <div class="col col-3">
        <div class="card text-white bg-primary mb-3 text-center" style="max-width: 25rem;">
            <div class="card-header">Admins</div>
            <div class="card-body">
                <h5 class="card-title"><?= esc($numAdmin) ?></h5>
            </div>
        </div>
    </div>

    <div class="col col-3">
        <div class="card text-white bg-secondary mb-3 text-center" style="max-width: 25rem;">
            <div class="card-header">Students</div>
            <div class="card-body">
                <h5 class="card-title"><?= esc($numStudents) ?></h5>
            </div>
        </div>
    </div>

    <div class="col col-3">
        <div class="card text-white bg-success mb-3 text-center" style="max-width: 25rem;">
            <div class="card-header">Courses</div>
            <div class="card-body">
                <h5 class="card-title"><?= esc($numCourses) ?></h5>
            </div>
        </div>
    </div>

    <div class="col col-3">
        <div class="card text-white bg-danger mb-3 text-center" style="max-width: 25rem;">
            <div class="card-header">Categories</div>
            <div class="card-body">
                <h5 class="card-title"><?= esc($numCategories) ?></h5>
            </div>
        </div>
    </div>

    <div class="col col-3">
        <div class="card text-dark bg-warning mb-3 text-center" style="max-width: 25rem;">
            <div class="card-header">Videos</div>
            <div class="card-body">
                <h5 class="card-title"><?= esc($numVideos) ?></h5>
            </div>
        </div>
    </div>
</div>