    <?php

    // echo "<pre>";
    // print_r($data);
    // echo "</pre>";
    if (isset($data['delete_sucess']) && $data['delete_sucess'] == TRUE) {
    ?>
        <div class="row">
            <div class="col s12">
                <strong>Success!</strong> Deletion of contact info was a success.
            </div>
        </div>
    <?php
    }
    if (isset($data['update_success']) && $data['update_success'] == TRUE) {
    ?>
        <div class="row">
            <div class="col s12">
                <strong>Success!</strong> Update of contact info was a success.
            </div>
        </div>
    <?php
    }
    if (isset($data['create_success']) && $data['create_success'] == TRUE) {
    ?>
        <div class="row">
            <div class="col s12">
                <strong>Success!</strong> Successfully registered a new contact info.
            </div>
        </div>
    <?php
    }
    if (isset($data['INFO_NOT_FOUND']) && $data['INFO_NOT_FOUND'] == TRUE) {
    ?>
        <div class="row">
            <div class="col s12">
                <strong>Error!</strong> Unable to find the info.
            </div>
        </div>
    <?php
    }
    ?>
    <div class="row">
        <div class="col s12">
            <a class="waves-effect waves-light btn" href="<?php echo $data['create_url']; ?>">
                <i class="material-icons left">add_to_photos</i>
                Add User
            </a>
        </div>
    </div>

    <br />
    <table class="responsive-table highlight">
        <thead>
            <tr>
                <th>ID #</th>
                <th>Name</th>
                <th>Contact #</th>
                <th>Email</th>
                <th>Date Inserted</th>
                <th>Date Updated</th>
                <th>Action/s</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data['contacts'] as $index => $contact) {
            ?>
                <tr>
                    <td><?php echo $contact['contact_id']; ?></td>
                    <td><?php echo $contact['contact_name']; ?></td>
                    <td><?php echo $contact['contact_number']; ?></td>
                    <td><?php echo $contact['contact_email']; ?></td>
                    <td><?php echo $contact['contact_inserted_on']; ?></td>
                    <td><?php echo $contact['contact_updated_on']; ?></td>
                    <td>
                        <a class="waves-effect waves-light blue btn-small" href="<?php echo $data['update_url'] . $contact['contact_id']; ?>">
                            <i class="material-icons left">update</i>
                            Update
                        </a>
                        <a class="waves-effect waves-light red btn-small" href="<?php echo $data['delete_url'] . $contact['contact_id']; ?>">
                            <i class="material-icons left">delete</i>
                            Delete
                        </a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>