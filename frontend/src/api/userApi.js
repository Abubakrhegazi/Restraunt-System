import { Post } from "./main";

export default async function createUser(userData) {
    const data = await Post('http://localhost/resturant-software/backend/src/controllers/UserController.php',

        {
            action: 'addUser',
            ...userData
        }
    );

    
    return data;
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