<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <style>
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin: 20px 0;
            font-size: 16px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th {
            padding: 15px;
            background-color: #252a48;
            color: white;
            text-align: left;
            font-weight: 600;
            font-size: 15px;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #eee;
            font-size: 14px;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        caption {
            font-size: 18px;
            font-weight: 600;
            padding: 10px 0;
            color: #333;
        }

        tr:last-child td {
            border-bottom: none;
        }

        ul {
            margin: 0;
            padding: 0;
            list-style-type: none;
        }

        li {
            padding-left: 1rem;
        }
    </style>

    <table>
        <caption>Department Information</caption>
        <thead>
            <tr>
                <th>Department Name</th>
                <th>Students in Department</th>
            </tr>
        </thead>
        <tbody>
            @foreach($departments as $department)
            <tr>
                <td>{{ $department->name }}</td>
                <td>
                    @if($department->students->isEmpty())
                        <p>No students in this department</p>
                    @else
                        <ul>
                            @foreach($department->students as $studentInDepartment)
                            <li>{{ $studentInDepartment->name }}</li>
                            @endforeach
                        </ul>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</x-layout>
