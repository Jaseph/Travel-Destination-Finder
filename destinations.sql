CREATE TABLE destinations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    country VARCHAR(255) NOT NULL,
    category VARCHAR(255),
    description TEXT,
    image_url VARCHAR(255)
);

INSERT INTO destinations (name, country, category, description, image_url) 
VALUES 
('Eiffel Tower', 'France', 'Landmark', 'A famous landmark in Paris.', 'https://via.placeholder.com/150'),
('Venice Canals', 'Italy', 'Romantic', 'Beautiful canals in Venice.', 'https://via.placeholder.com/150');
