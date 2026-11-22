<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encoder Dashboard</title>
</head>
<body>

    <h1>Encoder Dashboard</h1>

    @if (session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('encoder.crime.store') }}" method="POST">
        @csrf

        <label>Crime Category ID:</label>
        <input
            type="number"
            name="crime_category_id"
            value="{{ old('crime_category_id') }}"
            required
        >

        <br><br>

        <label>Severity:</label>
        <select name="severity" required>
            <option value="low" {{ old('severity') == 'low' ? 'selected' : '' }}>
                Low
            </option>
            <option value="moderate" {{ old('severity') == 'moderate' ? 'selected' : '' }}>
                Moderate
            </option>
            <option value="high" {{ old('severity') == 'high' ? 'selected' : '' }}>
                High
            </option>
        </select>

        <br><br>

        <label>Description:</label>
        <textarea name="description">{{ old('description') }}</textarea>

        <br><br>

        <label>Date and Time of Occurrence:</label>
        <input
            type="datetime-local"
            name="occurred_at"
            value="{{ old('occurred_at') }}"
            required
        >

        <br><br>

        <label>Address:</label>
        <input
            type="text"
            name="address"
            value="{{ old('address') }}"
            placeholder="Enter the crime location address"
            required
        >

        <br><br>

        <button type="submit">Submit Report</button>

    </form>

    <h2>Crime Reports: </h2>
    <ul id="crime-list"></ul>

    <script>
        fetch("{{ route('crimes.index') }}")
            .then(response => response.json())
            .then(data => {
                const crimeList = document.getElementById('crime-list');

                crimeList.innerHTML = '';

                data.data.forEach(crime => {
                    const li = document.createElement('li');

                    li.innerHTML = `
                        <strong>Crime Category ID:</strong> ${crime.crime_category_id}<br>
                        <strong>Station ID:</strong> ${crime.station_id}<br>
                        <strong>Reported By ID:</strong> ${crime.reported_by_id}<br>
                        <strong>Severity:</strong> ${crime.severity}<br>
                        <strong>Description:</strong> ${crime.description}<br>
                        <strong>Occurred At:</strong> ${crime.occurred_at}<br>
                        <strong>Reported At:</strong> ${crime.reported_at}<br>
                        <strong>Address:</strong> ${crime.address}<br>
                        <strong>Location:</strong> ${crime.location}
                    `;

                    crimeList.appendChild(li);
                });
            })
            .catch(error => console.error('Error fetching crimes:', error));
    </script>
    
    <style>
        #crime-list li {
            margin-bottom: 20px;
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }
    </style> <!-- hello front end dev, this code is a test code so its really messy its for testing backend orayt tootalooos -->
</body>
</html>
