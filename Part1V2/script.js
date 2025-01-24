
async function fetchSystemGroup() {
    try {
        const response = await fetch('api.php?route=system');
        const data = await response.json();
        
        const table = document.getElementById('systemTable');
        table.innerHTML = Object.entries(data)
            .map(([key, value]) => `
                <tr>
                    <td>${key}</td>
                    <td>${value}</td>
                    <td>${isEditable(key) ? createEditForm(key) : ''}</td>
                </tr>
            `).join('');
    } catch (error) {
        console.error('Error:', error);
    }
}

async function updateSystemValue(property, value) {
    try {
        const response = await fetch('api.php?route=system/update', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ property, value })
        });
        
        if (response.ok) {
            await fetchSystemGroup();
        }
    } catch (error) {
        console.error('Error:', error);
    }
}

async function fetchArpTable() {
    try {
        const response = await fetch('api.php?route=arp');
        const data = await response.json();
        
        const table = document.getElementById('arpTable');
        table.innerHTML = data.map(row => `
            <tr>
                <td>${row.index}</td>
                <td>${row.ipAddress}</td>
                <td>${row.physicalAddress}</td>
                <td>${row.type}</td>
            </tr>
        `).join('');
    } catch (error) {
        console.error('Error:', error);
    }
}

async function fetchTcpTable() {
    try {
        const response = await fetch('api.php?route=tcp');
        const data = await response.json();
        
        const table = document.getElementById('tcpTable');
        table.innerHTML = data.map(row => `
            <tr>
                <td>${row.index}</td>
                <td>${row.state}</td>
                <td>${row.localAddress}</td>
                <td>${row.localPort}</td>
                <td>${row.remoteAddress}</td>
                <td>${row.remotePort}</td>
            </tr>
        `).join('');
    } catch (error) {
        console.error('Error:', error);
    }
}

function isEditable(property) {
    return ['sysContact', 'sysName', 'sysLocation'].includes(property);
}

function createEditForm(property) {
    return `
        <form onsubmit="event.preventDefault(); updateSystemValue('${property}', this.value.value)">
            <input type="text" name="value" placeholder="New ${property}" required>
            <button type="submit">Update</button>
        </form>
    `;
}