document.getElementById('eventForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const eventName = document.getElementById('eventName').value;
    const eventDate = document.getElementById('eventDate').value;
    const eventLocation = document.getElementById('eventLocation').value;

    const events = JSON.parse(localStorage.getItem('events')) || [];
    
    events.push({
        event_name: eventName,
        event_date: eventDate,
        event_location: eventLocation
    });
    
    localStorage.setItem('events', JSON.stringify(events));
    this.reset();
    loadEvents();
});

function loadEvents() {
    const events = JSON.parse(localStorage.getItem('events')) || [];
    const eventList = document.getElementById('eventList');
    eventList.innerHTML = '';
    events.forEach((event, index) => {
        const li = document.createElement('li');
        li.textContent = `${event.event_name} - ${event.event_date} (${event.event_location})`;
        eventList.appendChild(li);
    });
}

// Load events on page load
window.onload = loadEvents;
