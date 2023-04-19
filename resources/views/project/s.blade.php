<!DOCTYPE html>
<html>
<head>
	<title>My Table Page</title>
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
		}
		
		th, td {
			border: 1px solid black;
			padding: 8px;
			text-align: left;
            text-align: center;
		}
		
		th {
			background-color: #ccc;
			font-weight: bold;
            text-align: center;
		}
		
		h1 {
			text-align: center;
		}
	</style>
</head>
<body>
	<h1>My Table Page</h1>
	<table>
		<thead>
			<tr>
				<th>#</th>
                <th>Name</th>
                <th> Status</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 0; ?>
            @foreach ($projects as $project)
                <tr>
                    <?php $i++; ?>
                    <td>{{ $i }}</td>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->status }}</td>
                </tr>
            @endforeach
		</tbody>
	</table>
</body>
</html>