<h1>Edit Student</h1>
@if($errors->any())
        <ul>
        @foreach ($errors->all() as $err )
            <li>{{ $err }}</li>
        @endforeach
        </ul>
@endif
<form method="post" action="{{ route('students.update' , $student) }}" enctype="multipart/form-data">
    @method('PUT')
    <div>
        <label for="name">Name</label>
        <input id="name" type="text" name="name" placeholder="Student Name" value="{{ $student->name }}" />
    </div>
    <div>
        <label for="email">Email</label>
        <input id="email" type="email" name="email" placeholder="Student Email" value="{{ $student->email }}" />
    </div>
    <div>
        <label for="phone">Phone</label>
        <input id="phone" type="text" name="phone" placeholder="Student Phone" value="{{ $student->phone }}" />
    </div>
    <div>
        <label for="Section">Section</label>
        <input id="section" type="text" name="section" placeholder="Studnet Section" value="{{ $student->section }}" />
    </div>
    <div>
        <label for="description">Description</label>
        <textarea id="description" name="description">{{ $student->description }}</textarea>
    </div>
    <div>
        <img id="preview" src="{{ asset('photos/'.$student->image) }}" alt="user photo preview" />
    </div>
    <div>
        <label for="image">Image</label>
        <input id="image" type="file" name="image" />
    </div>
    <div>
        <a href="{{ route('students.index') }}">Cancel</a>
        <button type="submit">Update Student</button>
    </div>
</form>
<script>
    document.getElementById('image').addEventListener('change' , function(event){
        $image = event.target.files[0];
        if($image){
            const reader = new FileReader();
            reader.onload = function(e){
                document.getElementById('preview').src=e.target.result;
            }
            reader.readAsDataURL($image);
        }
    })
</script>