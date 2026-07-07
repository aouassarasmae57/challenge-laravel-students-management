<h1>Create Student</h1>
<form>
    <div>
        <label for="name">Name</label>
        <input id="name" type="text" name="name" placeholder="Student Name" />
    </div>
    <div>
        <label for="email">Email</label>
        <input id="email" type="email" name="email" placeholder="Student Email" />
    </div>
    <div>
        <label for="phone">Phone</label>
        <input id="phone" type="text" name="phone" placeholder="Student Phone" />
    </div>
    <div>
        <label for="Section">Section</label>
        <input id="section" type="text" name="section" placeholder="Studnet Section" />
    </div>
    <div>
        <label for="description">Description</label>
        <textarea id="description" name="description"></textarea>
    </div>
    <div>
        <label for="image">Image</label>
        <input id="image" type="file" name="image" />
    </div>
    <div>
        <a href="{{ route('students.index') }}">Cancel</a>
        <button type="submit">Add Student</button>
    </div>
</form>