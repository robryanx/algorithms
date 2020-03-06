import array

def print_bin(x):
    for i in range(0, 8):
        if x & 128 > 0:
            print('1', end='')
        else:
            print('0', end='')

        x <<= 1

    print('')

def count_bits(x):
    num_bits = 0

    while x:
        num_bits += x & 1
        x >>= 1

    return num_bits

def parity(x):
    result = 0

    while x:
        result ^= x & 1

        x >>= 1

    return result

def pow2(x):
    count = 0

    while x:
        count+=1
        if count>1:
            return False

        x &= x - 1
    return True


def parity_set_bit(x):
    parity = 0

    while x:
        parity ^= 1 # flip the parity

        x &= x - 1

    return parity

def parity_lookups(x):
    mask_size = 16
    bit_mask = 0xFFFF

    return lookup[x >> (3 * mask_size)] ^ lookup[x >> (2 * mask_size) & bit_mask] ^ lookup[x >> mask_size & bit_mask] ^ lookup[x & bit_mask]

def parity_word(x):
    x ^= x >> 32
    x ^= x >> 16
    x ^= x >> 8
    x ^= x >> 4
    x ^= x >> 2
    x ^= x >> 1

    return x & 1

def parity_word_lookup(x):
    bit_mask = 0xFFFF

    x ^= x >> 32
    x ^= x >> 16

    return lookup[x & bit_mask]



lookup = array.array('b');

for i in range(0, 65536):
    lookup.append(parity_set_bit(i))




mask = 63
x = 77


print(bin(mask))
print(bin(x))
print(x & mask)



#print(count_bits(101))
# print(parity(3))
# print(parity_store(3))
# print(parity_set_bit(3))
# print(bin(65))
# print(bin(128))

print(parity(573121423114111))
print(parity_set_bit(573121423114111))
print(parity_lookups(573121423114111))
print(parity_word(573121423114111))
print(parity_word_lookup(573121423114111))

# print(bin(86))
# print_bin(86)

#print(lookup[554])


x = int('01010000', 2)
right = x & ~(x-1)
right -= 1
print(bin(x ^ right))

# 1010110
# 1010101 (x-1)
# 0101010 ~(x-1)
# 0000010 x & ~(x-1)

print(pow2(2))
print(pow2(3))
print(pow2(4))
print(pow2(6))
print(pow2(10))
print(pow2(16))