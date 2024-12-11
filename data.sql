CREATE TABLE seaman_job_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    email VARCHAR(255),
    gender VARCHAR(50),
    address VARCHAR(255),
    state VARCHAR(255),
    nationality VARCHAR(255),
    rank VARCHAR(255),  -- Job rank or position
    vessel_type VARCHAR(255),  -- Type of vessel the seaman specializes in
    years_of_experience INT,
    certifications TEXT,  -- Relevant certifications
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO seaman_job_data (id, first_name, last_name, email, gender, address, state, nationality, rank, vessel_type, years_of_experience, certifications, date_added) 
VALUES 
(1, 'John', 'Doe', 'jdoe0@marine.com', 'Male', 'Apt 123', 'Portsmouth', 'United Kingdom', 'Captain', 'Cargo Ship', 15, 'STCW, ISM Code', '2024-05-09 22:12:22'),
(2, 'Anna', 'Smith', 'asmith1@seafarers.org', 'Female', 'Suite 24', 'Hamburg', 'Germany', 'Chief Engineer', 'Tanker', 12, 'STCW, MARPOL', '2024-06-17 03:17:53'),
(3, 'Peter', 'Johnson', 'pjohnson2@crewlink.com', 'Male', 'Room 101', 'Marseille', 'France', 'Deck Officer', 'Cruise Ship', 8, 'GMDSS, Bridge Resource Management', '2024-10-23 19:16:05'),
(4, 'Maria', 'Garcia', 'mgarcia3@oceanic.net', 'Female', 'Room 320', 'Manila', 'Philippines', 'Second Engineer', 'Bulk Carrier', 10, 'STCW, Engine Room Safety', '2024-09-09 19:48:10'),
(5, 'Ahmed', 'Khan', 'akhan4@navy.net', 'Male', 'Apt 456', 'Karachi', 'Pakistan', 'Chief Cook', 'Container Ship', 7, 'Marine Culinary Certification', '2024-04-19 19:25:56'),
(6, 'Sofia', 'Ivanova', 'sivanova5@fleet.com', 'Female', 'PO Box 9876', 'Odessa', 'Ukraine', 'Radio Operator', 'Fishing Vessel', 5, 'GMDSS, Communication Systems', '2024-02-22 02:38:49'),
(7, 'James', 'Brown', 'jbrown6@nautical.org', 'Male', 'Room 405', 'Cape Town', 'South Africa', 'Bosun', 'Offshore Vessel', 12, 'Rope Handling, Ship Maintenance', '2024-09-18 22:49:52'),
(8, 'Emily', 'Wilson', 'ewilson7@crewlink.com', 'Female', 'Suite 77', 'Sydney', 'Australia', 'Third Officer', 'Research Vessel', 6, 'Advanced Firefighting, First Aid', '2024-07-24 22:34:56'),
(9, 'Carlos', 'Rodriguez', 'crodriguez8@maritime.com', 'Male', 'PO Box 22222', 'Panama City', 'Panama', 'Able Seaman', 'Tugboat', 9, 'Basic Training, Survival Craft', '2024-01-25 22:26:12'),
(10, 'Linda', 'Taylor', 'ltaylor9@navaljobs.org', 'Female', 'Suite 78', 'Miami', 'USA', 'Chief Officer', 'Oil Tanker', 14, 'Bridge Management, Tanker Operations', '2024-01-15 11:59:48'),
(11, 'Ali', 'Hassan', 'ahassana@seafarerhub.com', 'Male', 'Room 1103', 'Dubai', 'UAE', 'Pumpman', 'Chemical Tanker', 11, 'Cargo Handling, MARPOL', '2024-04-01 23:09:30'),
(12, 'Chen', 'Wei', 'cweib@seafarers.com', 'Male', 'Apt 649', 'Shanghai', 'China', 'Second Officer', 'Bulk Carrier', 8, 'Navigation, Radar Operations', '2023-12-21 03:40:44'),
(13, 'Nina', 'Petrova', 'npetrovac@crewfinder.net', 'Female', 'Room 598', 'Saint Petersburg', 'Russia', 'Wiper', 'Fishing Vessel', 2, 'Basic Safety Training', '2024-01-03 23:26:29'),
(14, 'Abdul', 'Rahman', 'arahmand@marinerhub.com', 'Male', 'Room 1922', 'Jeddah', 'Saudi Arabia', 'Third Engineer', 'Tanker', 5, 'Engine Maintenance, MARPOL', '2024-07-30 18:41:11'),
(15, 'Samuel', 'Lee', 'slee@oceancrew.com', 'Male', 'Suite 18', 'Busan', 'South Korea', 'Electrician', 'Cruise Ship', 10, 'Electrical Systems, Safety Procedures', '2024-02-22 06:13:30'),
(16, 'Elena', 'Morales', 'emoralesf@nautical.org', 'Female', 'Apt 426', 'Lima', 'Peru', 'Steward', 'Passenger Ferry', 4, 'Hospitality, Firefighting', '2024-01-02 17:59:58'),
(17, 'Victor', 'Fernandez', 'vfernandezg@maritimeteam.com', 'Male', 'Room 1449', 'Buenos Aires', 'Argentina', 'Deck Cadet', 'Cargo Ship', 2, 'Basic Seamanship', '2024-05-14 02:23:24'),
(18, 'Hiroshi', 'Tanaka', 'htanakah@fleetjobs.com', 'Male', 'Room 1399', 'Tokyo', 'Japan', 'Chief Mate', 'Research Vessel', 15, 'Navigation, Research Support', '2023-12-22 06:30:44'),
(19, 'Fatima', 'Ali', 'faliji@crewworld.com', 'Female', 'Apt 776', 'Casablanca', 'Morocco', 'Able Seaman', 'Oil Tanker', 7, 'Basic Safety Training', '2024-04-24 23:57:33'),
(20, 'William', 'White', 'wwhitek@marinerjobs.com', 'Male', 'PO Box 6345', 'Kingston', 'Jamaica', 'Ordinary Seaman', 'Container Ship', 3, 'Basic Firefighting', '2024-03-25 20:11:51');
