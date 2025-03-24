
CREATE TABLE room_status (
    room VARCHAR(10) PRIMARY KEY,
    schedule TINYINT(1) NOT NULL DEFAULT 0,
    override TINYINT(1) NOT NULL DEFAULT 2 -- 0 = force OFF, 1 = force ON, 2 = normal (use schedule)
);

INSERT INTO room_status (room, schedule, override) VALUES
('GV307', 0, 2),
('GV308', 0, 2),
('GV309', 0, 2);
