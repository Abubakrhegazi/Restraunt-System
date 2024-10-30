export default async function getMealsByResturantId(id) {
    const response = await fetch(`http://localhost/resturant-software/backend/src/controllers/MealController.php?action=getAllMealsByResturantId&resturant_id=${id}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
        },
    });

    const data = await response.json();
    return data;
}