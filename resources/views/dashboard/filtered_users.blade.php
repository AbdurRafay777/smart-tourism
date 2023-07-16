<thead>
    <tr>
        <th style="width: 1%"> No.</th>
        <th style="width: 20%">Name</th>
        <th style="width: 20%">Email</th>
        <th style="width: 20%">Contact No.</th>
        <th style="width: 20%">Actions</th>
    </tr>
</thead>
<tbody>
    @forelse ($users as $user)
        <tr>
            <th>{{ ++$i }}</th>
            <td>{{ $user->first_name }} {{ $user->last_name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->contact_no }}</td>
            <td class="project-actions">
                <form action="{{ route('destroy_user', $user->id) }}" method="POST">
                    <a class="btn btn-primary btn-sm" href="{{ route('show_user', $user->id) }}">
                        <i class="fas fa-folder"></i>
                        View
                    </a>
                    <a class="btn btn-info btn-sm" href="{{ route('edit_user', $user->id) }}">
                        <i class="fas fa-pencil-alt"></i>
                        Edit
                    </a>
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger btn-sm" type="submit">
                        <i class="fas fa-trash"></i>
                        Delete
                    </button>
                </form>
            </td>
        </tr>
    @empty
        <div class="alert alert-danger">
            <p>No Record Found</p>
        </div>
    @endforelse
</tbody>
