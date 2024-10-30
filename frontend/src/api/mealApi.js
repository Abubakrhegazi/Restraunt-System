export async function getMealsByResturantId(id) {
    const response = await fetch(`http://localhost/resturant-software/backend/src/controllers/MealController.php?action=getAllMealsByResturantId&resturant_id=${id}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
        },
    });

    const data = await response.json();
    return data;
}

export async function deleteMeals(name,id) {
    const response = await fetch(`http://localhost/resturant-software/backend/src/controllers/MealController.php?`, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            action: 'addUser',
            name,
            id,
        }),
    });

    const data = await response.json();
    return data;
}

