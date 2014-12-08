<?php require('includes/get_events.inc.php'); ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SmartCalendar!</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

    <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
    <div class="container">
        <div id="logo"><img src="assets/imgs/logo.png" /></div>

        <div class="row">
            <div class="col-md-12">
                <hr/>

                <p><button data-toggle="modal" data-target="#createModal" class="btn btn-success">+ Create New Event</button></p>

                <hr/>

                <p>Hi there! Here's your upcoming events...</p>

                <?php if(count($events) > 0) { ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Operations</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($events as $event){ ?>
                        <tr>
                            <td><?php echo $event->name ?></td>
                            <td><?php echo $event->notes ?></td>
                            <td><?php echo date('M d, Y - H:i', strtotime($event->happens_at)) ?></td>
                            <td>
                                <a href="delete.php?id=<?= $event->id ?>" onclick="return confirm('Do you really want to delete this event?')">Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                
                <?php } else { ?>
                
                <p class="error">... oops! No upcoming events! :(</p>
                
                <?php } ?>

                <hr/>

                <p class="small">Made by Francesco @ Sitepoint - 2014</p>
            </div>
        </div>
    </div>

    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Create New Event</h4>
          </div>
          <form action="create.php" method="post">
          <div class="modal-body">
            <p>Here you can specify your event details.</p>
            <p><input class="form-control" type="text" name="name" placeholder="Event's Name" /></p>
            <p><input class="form-control" type="text" name="notes" placeholder="Extra notes..." /></p>
            <p><input class="form-control" type="text" name="happens_at" placeholder="This event happens... when?" /></p>
          </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save</button>
              </div>
          </form>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>