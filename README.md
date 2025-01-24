# SNMP Manager in PHP

This repository contains the PHP-based SNMP Manager developed as part of the **Computer Networks 2 (10636455)** course at **An-Najah National University**. The SNMP Manager interacts with an SNMP agent to retrieve and display system information, ARP table, and TCP table.

## Project Overview

The SNMP Manager consists of three main pages:

1. **System Group Page**:
   - Displays the contents of the System Group (excluding the last item, System Services).
   - The last three items are editable (changeable) using SNMP write operations.
   - The community string is set to read-write to allow modifications.

2. **ARP Table Page**:
   - Displays the content of the ARP table retrieved from the SNMP agent.

3. **TCP Table Page**:
   - Displays the content of the TCP table retrieved from the SNMP agent.

The project also includes navigation buttons (Next, Previous, and Main Page) for easy movement between pages.

## Technologies Used
- **PHP**: For server-side logic and SNMP operations.
- **SNMP**: For querying and managing network devices.
- **XAMPP/WAMP**: For running the PHP server.
- **JavaScript**: For fetching data from the PHP server and displaying it dynamically on the client side.

## How to Run the Project

### Prerequisites
1. **XAMPP/WAMP**: Install XAMPP or WAMP to run the PHP server.
2. **SNMP Tools**: Ensure SNMP is configured on your system.

### Steps to Run
1. **Clone the Repository**:
   ```bash
   git clone https://github.com/YaraDaraghmeh/SNMP-Manager-PHP.git
