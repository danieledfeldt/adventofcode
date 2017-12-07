def get_maze_steps(input_list):
    count = 0
    i = 0
    while i >= 0 and i < len(input_list):
        change = input_list[i]
        input_list[i] += 1
        i += change
        count += 1
    return count
with open("day5.txt", 'r') as input_file:
    line_values = [int(line) for line in input_file]
print(get_maze_steps(line_values))