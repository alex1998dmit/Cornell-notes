@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-10">
            <div class="panel panel-default">
                    <div class="panel-heading">
                        Create a new note
                    </div>
            
                    <div class="panel-body">
                        <form action="{{ route('note.store') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="theme">Theme</label>
                                <input name="theme" id="theme" class="form-control">
                            </div>
            
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <input name="subject" id="subject" class="form-control">
                            </div>
            
                            {{-- <div class="form-group">
                                <label for="subject">
                                Select a Subject
                                </label>
                                <select name="subject_id" id="subject" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->name }}
                                        </option>
                                        @endforeach
                                </select>
                            </div> --}}
            
                            <div class="form-group">
                                <label for="tags"> Is open</label>
                                    <div class="checbox">
                                        <label><input type="radio" name="isOpen">Is open?</label>
                                    </div>
                            </div>
            
                            <div class="form-group">
                                <label for="leftContent">Left content</label>
                                <textarea name="leftContent" id="content" cols="5" rows="5" class="form-control"></textarea>
                            </div>
            
                            <div class="form-group">
                                <label for="rightContent">Right content</label>
                                <textarea name="rightContent" id="content" cols="5" rows="5" class="form-control"></textarea>
                            </div>
            
                            <div class="form-group">
                                <label for="bottomContent">Bottom content</label>
                                <textarea name="bottomContent" id="content" cols="5" rows="5" class="form-control"></textarea>
                            </div>
            
                            <div class="text-center">
                                <button class="btn btn-success" type="submit">
                                    Store Post
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
    </div>
   
</div>
  @endsection