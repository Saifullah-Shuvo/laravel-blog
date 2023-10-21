{{-- <form id="reply-form" style="display: none;">
    <!-- Add form fields for the reply -->
    <textarea name="reply_content" rows="4" cols="50"></textarea>
    <button type="submit">Submit Reply</button>
</form> --}}

@auth
<form id="reply-form" action="{{route('comment.reply.add')}}" method="POST" style="display: none">
    @csrf
    <div class="form-row">
        <input type="hidden" id="commentId" name="comment_id" value="">
        <div class="col-12 form-group">
            <textarea name="body" id="" cols="20" rows="3" class="form-control" placeholder="Enter Your Reply Here"></textarea>
        </div>
        <div class="col-sm-4 form-group">
            <input type="text" name="visitor_name" class="form-control" value={{$user->name}}>
        </div>
        <div class="col-sm-4 form-group">
            <input type="email" name="visitor_email" class="form-control" value={{$user->email}}>
        </div>
        <div class="col-sm-4 form-group">
            <input type="url" name="visitor_website" class="form-control" placeholder="Website">
        </div>
        <div class="form-group col-12">
            <button type="submit" class="btn btn-primary btn-block">Submit Reply</button>
        </div>
    </div>
</form>
@else
<form id="reply-form" action="{{route('comment.reply.add')}}" method="POST" style="display: none">
    @csrf
    <div class="form-row">
        <input type="hidden" id="commentId" name="comment_id" value="">
        <div class="col-12 form-group">
            <textarea name="body" id="" cols="20" rows="3" class="form-control" placeholder="Enter Your Reply Here"></textarea>
        </div>
        <div class="col-sm-4 form-group">
            <input type="text" name="visitor_name" class="form-control" placeholder="Name">
        </div>
        <div class="col-sm-4 form-group">
            <input type="email" name="visitor_email" class="form-control" placeholder="Email">
        </div>
        <div class="col-sm-4 form-group">
            <input type="url" name="visitor_website" class="form-control" placeholder="Website">
        </div>
        <div class="form-group col-12">
            <button type="submit" class="btn btn-primary btn-block">Submit Reply</button>
        </div>
    </div>
</form>
@endauth