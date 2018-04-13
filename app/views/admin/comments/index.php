<!-- Post Content -->
<article>
    <div class="container">
        <div class="row" style="display: flex; justify-content: center">
            <div class="col-md-12 mx-aut" style="padding-top: 90px">

                <div class="comments col-md-12" id="comments">
                    <h3 class="mb-2">Comments</h3>

                    <div class="comments-list">
                        <!-- comment -->
                        <?php foreach ($comments as $comment) : ?>
                            <div class="comment mb-2 row" style="padding-top: 50px">
                                <div class="comment-avatar col-md-1 col-sm-2 text-center pr-1">
                                    <a href=""><img class="mx-auto rounded-circle img-fluid" src="/public/img/uicon.png" alt="avatar"></a>
                                </div>
                                <div class="comment-content col-md-11 col-sm-10">
                                    <h6 class="small comment-meta">
                                        <em><?= $comment['name'] ?></em> <?= $comment['time'] ?></h6>
                                    <div class="comment-body">
                                        <p class="list-of-comment"><?= $comment['comment'] ?></p>
                                            <?php if ($comment['answer']) : ?>
                                                <hr>
                                                <span id="edit-answer-admin"><?=$comment['answer']?></span>
                                                <br>
                                                <br>
                                                <span class="text-right small icon-edit" data-num="<?= $comment['id'] ?>" style="cursor: pointer">Edit</span>
                                            <?php else : ?>
                                                <br>
                                                <span class="text-right small icon-reply" data-num="<?= $comment['id'] ?>">Reply</span>
                                            <?php endif; ?>
                                        <a href="/admin/comments/<?= $comment['id'] ?>/remove"><img src="/public/svg/rubbish-bin.svg" class="icon-delete" alt=""></a>
                                    </div>

                                    <div class="answerForm" id="form-<?=$comment['id']?>">
                                        <h5 class="mb-2">Write answer</h5>
                                        <div class="control-group">
                                            <div class="form-group floating-label-form-group controls">
                                                <label>Message</label>
                                                <textarea rows="3" class="form-control" placeholder="Answer" id="message-<?=$comment['id']?>" required data-validation-required-message="Please enter a message."></textarea>
                                                <p class="help-block text-danger"></p>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <button class="btn btn-primary" id="sendAnswer-<?=$comment['id']?>">Answer</button>
                                        </div>
                                    </div>

                                    <div class="editForm" id="edit-form-<?=$comment['id']?>" style="display: none">
                                        <h5 class="mb-2">Edit</h5>
                                        <div class="control-group">
                                            <div class="form-group floating-label-form-group controls">
                                                <label>Message</label>
                                                <textarea rows="3" class="form-control" placeholder="Answer" id="edit-message" required data-validation-required-message="Please enter a message."></textarea>
                                                <p class="help-block text-danger"></p>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <button class="btn btn-primary" id="sendEdit-<?=$comment['id']?>">Edit</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>

<script>

    $(".icon-edit").click(function () {

        var id = $(this).attr("data-num");
        $("#edit-form-"+id).toggle();

        $("#sendEdit-"+id).click(function () {
            var answer = $("#edit-message").val();

            $.ajax({
                type: 'POST',
                data: {
                    'edit': {
                        'message': answer,
                        'id': id
                    }
                },
                success: function (reply) {
                    location.reload();
                }
            });

        });


    });

    $(".icon-reply").click(function () {

        var id = $(this).attr("data-num");
        $("#form-"+id).toggle();

        $("#sendAnswer-"+id).click(function () {
            var answer = $("#message-"+id).val();
            $.ajax({
                type: 'POST',
                data: {
                    'answer': {
                        'message': answer,
                        'id': id
                    }
                },
                success: function () {
                    location.reload();
                }
            });

        });


    });
</script>