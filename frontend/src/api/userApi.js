import { Post } from "./main";

export default async function createUser(userData) {
    try {
        const response = await Post('http://localhost/resturant-software/backend/public/index.php', 
        { 
            ...userData
        },
        {
            headers: {'Content-Type': 'application/json'},

            params: {
                module:'user',
                action: 'insert',
            }
        });

        return response;
    } catch (error) {
        console.error('Error:', error);
        return { status: 'error', message: 'An error occurred' };
    }
}




























    /* OLD POST */
    // const response = await fetch('http://localhost/resturant-software/backend/src/controllers/UserController.php', {
    //     method: 'POST',
    //     headers: {
    //         'Content-Type': 'application/json',
    //     },
    //     body: JSON.stringify({
    //         action: 'addUser',
    //         ...userData,
    //     }),
    // });