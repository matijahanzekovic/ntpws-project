<?php

    function showModal() {
        echo "
            <script type='text/javascript'>
                $(document).ready(function() {
                    $('#exampleModal').modal('show');
                });
            </script>
        ";
    }

    function createModal($title, $message) {
        print '
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                    ' . $title . '
                                </h5>
                            </div>
                            <div class="modal-body">
                                ' . $message . '
                            </div>
                            <div class="modal-footer">
                                <button type="button" name="closeButton" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
        ';
    }

?>