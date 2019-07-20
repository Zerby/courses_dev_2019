import pandas as pd
import numpy as np
import matplotlib.pyplot as plt

df = pd.read_csv("sample.csv")
df.describe()

#print(df["passenger_count"].std()) #ecart type

for i in range(0, 5):
    plt.scatter(df["pickup_datetime"][i], df["passenger_count"][i])

plt.title('Analyse')
plt.xlabel('Pickup_datetime')
plt.ylabel('Passenger_count')
plt.show()

# df.head()

print(df.head(100)["pickup_datetime"]) #affiche les 100 premiers dates

daily = df
daily["pickup_datetime"] = pd.to_datetime(df[["pickup_datetime"]])
daily = daily.set_index("pickup_datetime")
daily["day_of_week"] = daily.index.weekday_name
daily["month_of_the_year"] = daily.index.month
daily.sample(20)