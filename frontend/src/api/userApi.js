export default async function createUser(userData) {
    const response = await fetch('http://localhost/resturant-software/backend/src/routes/api.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            action: 'addUser',
            ...userData,
        }),
    });

    const data = await response.json();
    return data;
}