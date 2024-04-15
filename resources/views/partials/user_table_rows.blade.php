@foreach ($users as $user)
    <tr>
        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
        <td>{{ $user->address }}</td>
        <td>{{ $user->phone }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->birthdate }}</td>
        <td>
            @if($user->id_file_name)
                <a href="{{ route('downloadFile', $user->id_file_name) }}">
                    <i class="fas fa-file-pdf"></i>
                </a>
            @else
                No ID Verification
            @endif
        </td>
    
    </tr>
@endforeach