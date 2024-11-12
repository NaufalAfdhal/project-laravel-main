<x-layout>
    <x-slot:title>Tambah Data Student</x-slot:title>




    <!-- Form to add new student -->
    <form action="{{ url('/student/store') }}" method="POST" style="margin-top: 20px;">
        @csrf <!-- CSRF protection for form security -->

        <div style="margin-bottom: 10px;">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" required>
        </div>

        <div style="margin-bottom: 10px;">
            <label for="grade">Grade:</label><br>
            <input type="text" id="grade" name="grade" required>
        </div>

        <div style="margin-bottom: 10px;">
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required>
        </div>

        <div style="margin-bottom: 10px;">
            <label for="address">Address:</label><br>
            <input type="text" id="address" name="address" required>
        </div>

        <button type="submit" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px;">Submit</button>
    </form>
</x-layout>
