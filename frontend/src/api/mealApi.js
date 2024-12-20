import { Get, Delete } from "./main";

const URL = 'http://localhost/resturant-software/backend/src/controllers/MealController.php'

export async function getMealsByResturantId(id) {
    const response = await fetch(`${URL}?action=getAllMealsByResturantId&resturant_id=${id}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
        },
    });

    const data = await response.json();
    return data;
}

export async function deleteMeals(name,id) {
    const data = await Delete(`${URL}`,
        {
            action:'deleteMealByMealNameAndRsturantId',
            name,
            id
        })

    return data;
}

















































    // const response = await fetch(`http://localhost/resturant-software/backend/src/controllers/MealController.php?`, {
    //     method: 'DELETE',
    //     headers: {
    //         'Content-Type': 'application/json',
    //     },
    //     body: JSON.stringify({
    //         action: 'deleteMealByMealNameAndRsturantId',
    //         id,
    //         name,
    //     }),
    // });